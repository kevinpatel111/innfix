@extends('layouts.admin')

@section('content')

<h2>Welcome to Madhuram Overseas Panel</h2>

<p style="color:#999; margin-top:10px; max-width:700px;">
This dashboard allows you to manage company information, products, categories,
inquiries, partnerships, and catalogues from one central place.
</p>

<div class="dashboard-cards">

    <div class="dash-card">
        <h4>Company Details</h4>
        <p>Manage contact details, social links, address, and communication info.</p>
    </div>

    <div class="dash-card">
        <h4>Product Management</h4>
        <p>Create and organize categories, sub-categories, and products.</p>
    </div>

    <div class="dash-card">
        <h4>Inquiries</h4>
        <p>View and respond to contact and partnership inquiries.</p>
    </div>

    <div class="dash-card">
        <h4>Catalogue</h4>
        <p>Upload and manage downloadable product catalogues.</p>
    </div>

</div>

@endsection
