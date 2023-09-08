@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "412 - Precondition Failed")
@section("code", "412")
@section("message", "Precondition Failed")
@section("description", "The precondition given in the request evaluated to false by the server")
