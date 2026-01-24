@if (session('success'))
<div id="successPopup" class="custom-success-popup">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div id="errorPopup" class="custom-error-popup">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div id="errorPopup" class="custom-error-popup">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successPopup = document.getElementById('successPopup');
        const errorPopup = document.getElementById('errorPopup');

        if (successPopup) setTimeout(() => successPopup.remove(), 4000);
        if (errorPopup) setTimeout(() => errorPopup.remove(), 4000);
    });
</script>