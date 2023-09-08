@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "506 - Variant Also Negotiates")
@section("code", "506")
@section("message", "Variant Also Negotiates")
@section("description", "Transparent content negotiation for the request results in a circular reference")
