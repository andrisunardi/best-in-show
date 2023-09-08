@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "429 - Too Many Requests")
@section("code", "429")
@section("message", "Too Many Requests")
@section("description", "The user has sent too many requests in a given amount of time. Intended for use with rate-limiting schemes")
