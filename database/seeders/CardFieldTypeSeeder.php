<?php

namespace Database\Seeders;

use Conkard\Enums\CardFieldCategory;
use Conkard\Models\CardFieldType;
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
                'order' => 1,
            ],
            [
                'name' => 'Job Title',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/job-title.svg'),
                'suggested_labels' => null,
                'order' => 2,
            ],
            [
                'name' => 'Department',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/department.svg'),
                'suggested_labels' => null,
                'order' => 3,
            ],
            [
                'name' => 'Company Name',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/company-name.svg'),
                'suggested_labels' => null,
                'order' => 4,
            ],
            [
                'name' => 'Industry',
                'display_icon' => false,
                'category' => CardFieldCategory::PERSONAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/industry.svg'),
                'suggested_labels' => null,
                'order' => 5,
            ],
            [
                'name' => 'Email',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/email.svg'),
                'suggested_labels' => 'Work,Personal',
                'order' => 6,
            ],
            [
                'name' => 'Phone',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/phone.svg'),
                'suggested_labels' => 'Telephone,Mobile,Work,Personal',
                'order' => 7,
            ],
            [
                'name' => 'Company URL',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/company-url.svg'),
                'suggested_labels' => 'Visit our website',
                'order' => 8,
            ],
            [
                'name' => 'Link',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/link.svg'),
                'suggested_labels' => '',
                'order' => 9,
            ],
            [
                'name' => 'Address',
                'display_icon' => true,
                'category' => CardFieldCategory::GENERAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/address.svg'),
                'suggested_labels' => 'Office Address,Home Address',
                'order' => 10,
            ],
            [
                'name' => 'Facebook',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/facebook.svg'),
                'suggested_labels' => 'Friend me on facebook',
                'order' => 11,
            ],
            [
                'name' => 'X',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/x.svg'),
                'suggested_labels' => 'Follow me on X',
                'order' => 12,
            ],
            [
                'name' => 'Instagram',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/instagram.svg'),
                'suggested_labels' => 'Follow me on Instagram',
                'order' => 13,
            ],
            [
                'name' => 'Threads',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/threads.svg'),
                'suggested_labels' => '',
                'order' => 14,
            ],
            [
                'name' => 'LinkedIn',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/linkedin.svg'),
                'suggested_labels' => 'Connect with me on LinkedIn',
                'order' => 15,
            ],
            [
                'name' => 'Youtube',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/youtube.svg'),
                'suggested_labels' => 'Subscribe to my channel on Youtube',
                'order' => 16,
            ],
            [
                'name' => 'Tiktok',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/tiktok.svg'),
                'suggested_labels' => 'Follow me on Tiktok',
                'order' => 17,
            ],
            [
                'name' => 'Spotify',
                'display_icon' => true,
                'category' => CardFieldCategory::SOCIAL->value,
                'icon_url' => Storage::disk('public')->url('images/icons/spotify.svg'),
                'suggested_labels' => 'Listen to my podcast',
                'order' => 18,
            ],
            [
                'name' => 'Skype',
                'display_icon' => true,
                'category' => CardFieldCategory::MESSAGING->value,
                'icon_url' => Storage::disk('public')->url('images/icons/skype.svg'),
                'suggested_labels' => 'Call me on Skype',
                'order' => 19,
            ],
            [
                'name' => 'Telegram',
                'display_icon' => true,
                'category' => CardFieldCategory::MESSAGING->value,
                'icon_url' => Storage::disk('public')->url('images/icons/skype.svg'),
                'suggested_labels' => 'Connect with me on Telegram',
                'order' => 20,
            ],
            [
                'name' => 'Whatsapp',
                'display_icon' => true,
                'category' => CardFieldCategory::MESSAGING->value,
                'icon_url' => Storage::disk('public')->url('images/icons/whatsapp.svg'),
                'suggested_labels' => 'Connect with me on Whatsapp,Add me on Whatsapp',
                'order' => 21,
            ],
            [
                'name' => 'Calendly',
                'display_icon' => true,
                'category' => CardFieldCategory::BUSINESS->value,
                'icon_url' => Storage::disk('public')->url('images/icons/calendly.svg'),
                'suggested_labels' => 'Book a session with me,Book a call with me',
                'order' => 22,
            ],
            [
                'name' => 'Others',
                'display_icon' => true,
                'category' => CardFieldCategory::OTHERS->value,
                'icon_url' => Storage::disk('public')->url('images/icons/others.svg'),
                'suggested_labels' => null,
                'order' => 23,
            ],
        ];

        CardFieldType::insert($fieldTypes);
    }
}
