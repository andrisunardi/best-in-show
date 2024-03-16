<?php

namespace App\Livewire\ContactUs;

use App\Enums\ContactCategory;
use App\Livewire\Component;
use App\Mail\ContactMail;
use App\Services\ContactService;
use Illuminate\Support\Facades\Mail;
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
            // 'attachment' => 'nullable|file',
            'attachment' => 'nullable|file|mimes:xps,pdf,doc,docx,rtf,txt,xls,clsx,csv,bmp,png,jpeg,jpg|max:4300',
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
        $contact = (new ContactService())->add(data: $this->validate());

        if (env('APP_ENV') == 'production') {
            Mail::to('contact@'.env('APP_DOMAIN'))->send(new ContactMail($contact));
            Mail::to(env('CONTACT_EMAIL'))->send(new ContactMail($contact));
        }

        $this->resetFields();

        return $this->alert('success', trans('index.contact_success'), [
            'html' => trans('index.thank_you_for_contacting_us_we_will_answer_as_soon_as_possible'),
        ]);
    }

    public function render()
    {
        return view('livewire.contact-us.index');
    }
}
