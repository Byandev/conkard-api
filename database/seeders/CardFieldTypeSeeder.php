<?php

namespace Database\Seeders;

use App\Enums\CardFieldCategory;
use App\Models\CardFieldType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CardFieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fieldTypes = [
            [
                'name' => 'Name',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/name.svg'),
                'suggested_labels' => null,
            ],
            [
                'name' => 'Job Title',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/job-title.svg'),
                'suggested_labels' => null,
            ],
            [
                'name' => 'Department',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/department.svg'),
                'suggested_labels' => null,
            ],
            [
                'name' => 'Company Name',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/company-name.svg'),
                'suggested_labels' => null,
            ],
            [
                'name' => 'Industry',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/industry.svg'),
                'suggested_labels' => null,
            ],
            [
                'name' => 'Email',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/email.svg'),
                'suggested_labels' => 'Work,Personal',
            ],
            [
                'name' => 'Phone',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/phone.svg'),
                'suggested_labels' => 'Telephone,Mobile,Work,Personal',
            ],
            [
                'name' => 'Company URL',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/company-url.svg'),
                'suggested_labels' => 'Visit our website',
            ],
            [
                'name' => 'Link',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/link.svg'),
                'suggested_labels' => '',
            ],
            [
                'name' => 'Address',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/address.svg'),
                'suggested_labels' => 'Office Address,Home Address',
            ],
            [
                'name' => 'Facebook',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/facebook.svg'),
                'suggested_labels' => 'Friend me on facebook',
            ],
            [
                'name' => 'X',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/x.svg'),
                'suggested_labels' => 'Follow me on X',
            ],
            [
                'name' => 'Instagram',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/instagram.svg'),
                'suggested_labels' => 'Follow me on Instagram',
            ],
            [
                'name' => 'Threads',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/threads.svg'),
                'suggested_labels' => '',
            ],
            [
                'name' => 'LinkedIn',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/linkedin.svg'),
                'suggested_labels' => 'Connect with me on LinkedIn',
            ],
            [
                'name' => 'Youtube',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/youtube.svg'),
                'suggested_labels' => 'Subscribe to my channel on Youtube',
            ],
            [
                'name' => 'Tiktok',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/tiktok.svg'),
                'suggested_labels' => 'Follow me on Tiktok',
            ],
            [
                'name' => 'Spotify',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/spotify.svg'),
                'suggested_labels' => 'Listen to my podcast',
            ],
            [
                'name' => 'Skype',
                'display_icon' => true,
                'category' => CardFieldCategory::MESSAGING->value,
                'icon_url' => Storage::disk('public')->url('images/icons/skype.svg'),
                'suggested_labels' => 'Call me on Skype',
            ],
            [
                'name' => 'Telegram',
                'display_icon' => true,
                'category' => CardFieldCategory::MESSAGING->value,
                'icon_url' => Storage::disk('public')->url('images/icons/skype.svg'),
                'suggested_labels' => 'Connect with me on Telegram',
            ],
            [
                'name' => 'Whatsapp',
                'display_icon' => true,
                'category' => CardFieldCategory::MESSAGING->value,
                'icon_url' => Storage::disk('public')->url('images/icons/whatsapp.svg'),
                'suggested_labels' => 'Connect with me on Whatsapp,Add me on Whatsapp',
            ],
            [
                'name' => 'Calendly',
                'display_icon' => true,
                'category' => CardFieldCategory::BUSINESS->value,
                'icon_url' => Storage::disk('public')->url('images/icons/calendly.svg'),
                'suggested_labels' => 'Book a session with me,Book a call with me',
            ],
            [
                'name' => 'Others',
                'display_icon' => true,
                'category' => CardFieldCategory::OTHERS->value,
                'icon_url' => Storage::disk('public')->url('images/icons/others.svg'),
                'suggested_labels' => null
            ],
        ];

        CardFieldType::insert($fieldTypes);
    }
}
