@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "402 - Payment Required")
@section("code", "402")
@section("message", "Payment Required")
@section("description", "Reserved for future use")
