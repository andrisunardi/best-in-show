@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "424 - Locked")
@section("code", "424")
@section("message", "Locked")
@section("description", "The request failed because it depended on another request and that request failed (e.g., a PROPPATCH)")
