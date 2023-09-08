@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "423 - Locked")
@section("code", "423")
@section("message", "Locked")
@section("description", "The resource that is being accessed is locked")
