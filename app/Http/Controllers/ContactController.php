<?php

namespace Conkard\Http\Controllers;

use Conkard\Http\Resources\ContactResource;
use Conkard\Models\Card;
use Conkard\Models\Contact;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = QueryBuilder::for(Contact::class)
            ->with([
                'card' => ['fields' => ['type']],
            ])
            ->where('user_id', auth()->id())
            ->paginate($request->input('page_size', 10));

        return ContactResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['card_id' => 'required|exists:cards,id']);

        $card = Card::find($request->input('card_id'));

        if (auth()->id() === $card->user_id) {
            return response(['message' => 'Forbidden'], 403);
        }

        $contact = auth()->user()->contacts()->create([
            'card_id' => $request->input('card_id'),
        ]);

        return ContactResource::make($contact->load('card'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        if (auth()->id() !== $contact->user_id) {
            return response(['message' => 'Unauthorized'], 401);
        }

        $contact->load([
            'card' => ['fields' => ['type']],
        ]);

        return ContactResource::make($contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if (auth()->id() !== $contact->user_id) {
            return response(['message' => 'Unauthorized'], 401);
        }

        $contact->delete();

        return response()->noContent();
    }
}
