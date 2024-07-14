<?php

namespace Conkard\Http\Controllers\V1\Card;

use Conkard\Http\Controllers\Controller;
use Conkard\Http\Requests\CardRequest;
use Conkard\Http\Resources\CardResource;
use Conkard\Models\Card;
use Conkard\Models\CardField;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = QueryBuilder::for(Card::class)
            ->where('user_id', auth()->id())
            ->paginate($request->input('page_size', 10));

        return CardResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardRequest $request)
    {
        $card = Card::create([
            'id' => Str::uuid()->toString(),
            'user_id' => auth()->id(),
            'label' => $request->input('label')
        ]);

        foreach ($request->input('fields') as $field) {
            CardField::create([
                'card_id' => $card->id,
                'type_id' => $field['type_id'],
                'value' => $field['value'],
                'label' => $field['label'] ?? null
            ]);
        }

        return CardResource::make($card->load(['fields' => ['type']]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        return CardResource::make($card->load(['fields' => ['type']]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CardRequest $request, Card $card)
    {
        $card->fields()->delete();

        $card->update(['label' => $request->post('label')]);

        foreach ($request->input('fields') as $field) {
            CardField::create([
                'card_id' => $card->id,
                'type_id' => $field['type_id'],
                'value' => $field['value'],
                'label' => $field['label'] ?? null
            ]);
        }

        return CardResource::make($card->fresh()->load(['fields' => ['type']]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return response()->noContent();
    }
}
