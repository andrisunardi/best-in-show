@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "426 - Upgrade Required")
@section("code", "426")
@section("message", "Upgrade Required")
@section("description", "The client should switch to a different protocol such as TLS/1.0, given in the Upgrade header field")
