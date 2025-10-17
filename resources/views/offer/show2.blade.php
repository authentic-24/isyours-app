@extends('layouts/app2')

@section('content')
    @include('partials/errors_div')
    
    @include('offer/partial_job_detail')
    
  @if(session()->has('admin') || (!is_null($company) && $company->id == $offer->company_id ))
    @include('offer/partial_candidate_list')
  @endif
@endsection

