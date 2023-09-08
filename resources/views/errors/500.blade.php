@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "500 - Internal Server Error")
@section("code", "500")
@section("message", "Internal Server Error")
@section("description", "A generic error message, given when no more specific message is suitable")
