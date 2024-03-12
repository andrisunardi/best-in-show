<?php

namespace App\Livewire\ContactUs;

use App\Enums\ContactCategory;
use App\Livewire\Component;
use App\Services\ContactService;
use Illuminate\Validation\Rules\Enum;

class ContactUsPage extends Component
{
    public $category;

    public $message;

    public $attachment;

    public $first_name;

    public $last_name;

    public $email;

    public $address;

    public $city;

    public $province;

    public $postal_code;

    public $phone_country;

    public $phone;

    public function resetFields()
    {
        $this->reset([
            'category',
            'message',
            'attachment',
            'first_name',
            'last_name',
            'email',
            'address',
            'city',
            'province',
            'postal_code',
            'phone_country',
            'phone',
        ]);
    }

    public function rules()
    {
        return [
            'category' => ['required', 'integer', new Enum(ContactCategory::class)],
            'message' => 'required|string|max:1000',
            'attachment' => 'nullable|file',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => "required|string|max:50|email:rfc,dns|regex:/^\S*$/u",
            'address' => 'required|string|max:200',
            'city' => 'nullable|string|max:50',
            'province' => 'nullable|string|max:50',
            'postal_code' => 'nullable|integer|digits:5',
            'platform' => 'nullable|string|max:200',
            'phone_country' => 'required|string|max:5',
            'phone' => 'required|string|max:15',
        ];
    }

    public function submit()
    {
        (new ContactService())->add(data: $this->validate());

        return $this->alert('success', trans('index.success'), [
            'html' => trans('index.thank_you_for_contacting_us_we_will_answer_as_soon_as_possible'),
        ]);
    }

    public function render()
    {
        return view('livewire.contact-us.index');
    }
}
