@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "508 - Loop Detected")
@section("code", "508")
@section("message", "Loop Detected")
@section("description", "The server detected an infinite loop while processing the request (sent instead of 208 Already Reported)")
