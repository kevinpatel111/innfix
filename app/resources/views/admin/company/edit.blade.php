@extends('admin.layout')

@section('content')

<h2>Company Contact Details</h2>

@if(session('success'))
    <p class="success-msg">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('admin.company.update') }}" id="companyForm">
@csrf

<!-- ACTION BUTTONS -->
<div class="action-bar">
    <button type="button" id="editBtn" class="btn-outline">Edit</button>
    <button type="submit" id="saveBtn" class="btn-primary d-none">Save</button>
    <button type="button" id="cancelBtn" class="btn-outline d-none">Cancel</button>
</div>

<!-- COMPANY NAME -->
<div class="form-group">
    <label>Company Name</label>
    <input type="text" name="company_name"
           value="{{ $company->company_name ?? '' }}"
           class="form-control half"
           disabled required>
</div>

<!-- EMAILS -->
<div class="form-group">
    <label>Email</label>
    <div id="emails">
        @foreach($company->emails ?? [] as $email)
            <div class="inline-row">
                <input type="email" name="emails[]" value="{{ $email }}"
                       class="form-control half" disabled>
                <button type="button" class="delete-btn d-none" onclick="removeRow(this)">✕</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="add-btn d-none" onclick="addField('emails','email')">+ Add Email</button>
</div>


<!-- PHONES -->
<div class="form-group">
    <label>Phone</label>
    <div id="phones">
        @foreach($company->phones ?? [] as $phone)
            <div class="inline-row">
                <input type="text" name="phones[]" value="{{ $phone }}"
                       class="form-control half" disabled>
                <button type="button" class="delete-btn d-none" onclick="removeRow(this)">✕</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="add-btn d-none" onclick="addField('phones','text')">+ Add Phone</button>
</div>


<!-- WHATSAPP -->
<div class="form-group">
    <label>WhatsApp</label>
    <input type="text" name="whatsapp"
           value="{{ $company->whatsapp ?? '' }}"
           class="form-control half" disabled>
</div>

<!-- ADDRESS -->
<div class="form-group">
    <label>Address</label>
    <textarea name="address" class="form-control half"
              disabled>{{ $company->address ?? '' }}</textarea>
</div>

<!-- MAP -->
<div class="form-group">
    <label>Google Map Link</label>
    <input type="text" name="google_map_link"
           value="{{ $company->google_map_link ?? '' }}"
           class="form-control half" disabled>
</div>

<div class="form-group">
    <label>Social Links</label>

    <div id="socials">
        @foreach($company->social_links ?? [] as $index => $social)
            <div class="inline-row social-row">

                <!-- VIEW MODE -->
                <div class="social-view">
    <a href="{{ $social['url'] ?? '#' }}"
       target="_blank"
       class="input-like-link">
        {{ ucfirst($social['platform'] ?? '') }}
    </a>
</div>


                <!-- EDIT MODE -->
                <div class="social-edit d-none">
                    <input type="text"
                           name="social_links[{{ $index }}][platform]"
                           value="{{ $social['platform'] ?? '' }}"
                           class="form-control half"
                           placeholder="Platform">

                    <input type="text"
                           name="social_links[{{ $index }}][url]"
                           value="{{ $social['url'] ?? '' }}"
                           class="form-control half"
                           placeholder="URL">

                    <button type="button"
                            class="delete-btn"
                            onclick="removeRow(this)">✕</button>
                </div>

            </div>
        @endforeach
    </div>

    <button type="button"
            class="add-btn d-none"
            onclick="addSocial()">+ Add Social</button>
</div>


</form>

<!-- JS -->
<script>
const editBtn = document.getElementById('editBtn');
const saveBtn = document.getElementById('saveBtn');
const cancelBtn = document.getElementById('cancelBtn');
const form = document.getElementById('companyForm');

editBtn.onclick = () => toggleEdit(true);
cancelBtn.onclick = () => location.reload();

function toggleEdit(edit) {
    // Enable / disable inputs
    form.querySelectorAll('input, textarea').forEach(el => {
        el.disabled = !edit;
    });

    // Toggle add buttons
    document.querySelectorAll('.add-btn').forEach(btn => {
        btn.classList.toggle('d-none', !edit);
    });

    // Toggle delete buttons
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.classList.toggle('d-none', !edit);
    });

    // Toggle social view/edit
    document.querySelectorAll('.social-view').forEach(el => {
        el.classList.toggle('d-none', edit);
    });
    document.querySelectorAll('.social-edit').forEach(el => {
        el.classList.toggle('d-none', !edit);
    });

    editBtn.classList.toggle('d-none', edit);
    saveBtn.classList.toggle('d-none', !edit);
    cancelBtn.classList.toggle('d-none', !edit);
}

function addField(id, type) {
    document.getElementById(id).insertAdjacentHTML(
        'beforeend',
        `<div class="inline-row">
            <input type="${type}" name="${id}[]" class="form-control">
            <button type="button" class="delete-btn" onclick="removeRow(this)">✕</button>
        </div>`
    );
}

function addSocial() {
    const socials = document.getElementById('socials');
    const index = socials.children.length;

    socials.insertAdjacentHTML(
        'beforeend',
        `<div class="inline-row social-row">
            <div class="social-edit">
                <input type="text"
                       name="social_links[${index}][platform]"
                       class="form-control half"
                       placeholder="Platform">

                <input type="text"
                       name="social_links[${index}][url]"
                       class="form-control half"
                       placeholder="URL">

                <button type="button"
                        class="delete-btn"
                        onclick="removeRow(this)">✕</button>
            </div>
        </div>`
    );
}

function removeRow(btn) {
    btn.closest('.inline-row').remove();
}
</script>

@endsection
