<!DOCTYPE html>
<html>
<head>
    <title>WanderBit Admin</title>
    {{-- <link rel="stylesheet" href="{{asset ('assets\css\stylecss.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        textarea {
    resize: vertical;
    width: 700px;
    border-radius: 10px;
}
 body {
    background-color: #ffffff !important;
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
 /* body {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%) !important;
    margin: 0;
    color: #ffffff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
} */
         .btn-sm:hover{
              background-color: #123456;
            color: white;
         }
        .navbar { background-color: #1a374d !important; }
        .dash {
    display: flex;
    justify-content: center;
}
form.form1 {
    position: absolute;
    top: 100px;
    left: 286px;
}
a.btn.add {
    position: absolute;
    top: 72px;
    left: 1220px;
    z-index: 20000;
    background-color: #1a374d;
    color: white;
}
.cont {
    padding-left: 100px;
}
form.form1 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
    padding: 50px;
}
form.form1 input{
    width: 700px;
     padding: 20px;
    border-radius: 10px;
}
 button{
  width: 300px ;
  border-radius: 20px;
}
button#delete {
    width: 140px;
    border-radius: 30px;
}
.btn-success {
    width: 140px;
    border-radius: 30px;
    --bs-btn-color: #fff;
    --bs-btn-bg: #198754;
    --bs-btn-border-color: #198754;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #157347;
    --bs-btn-hover-border-color: #146c43;
    --bs-btn-focus-shadow-rgb: 60, 153, 110;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #146c43;
    --bs-btn-active-border-color: #13653f;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #198754;
    --bs-btn-disabled-border-color: #198754;
}
 button:hover{
  color: #ffffff;
  background-color: #000000;
}
.form-control{
   box-shadow: 1px 1px 1px 1px #000000 ;
  border-radius: 10px;
}
table.table.table-hover.mb-0 {
    display: contents;
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
    width: 100px;
    padding: 5px;
}
table {
    display: flex;
    flex-direction: row;
    /* justify-content: center; */
    position: relative;
    top: 125px;
    left:  71px;
    /* padding: 20px; */
       border: solid #1a374d;
    border-width: 3px;
  /* width: 8%; */
    border-collapse: collapse;
    table-layout: fixed;
     width: 100% !important;
}
.table thead {
    display: table-header-group !important;
}

.table tbody {
    display: table-row-group !important;
}

.table tr {
    display: table-row !important;
}

.table th,
.table td {
    padding:  10px;
    text-align: center;
    vertical-align: middle;
    border: 1px solid #1a374d;
    word-wrap: break-word;
    display: table-cell;
    text-align: center; */
    /* white-space: nowrap; */
}
.table td:last-child {
    min-width: 150px;
}

.badge {
    font-size: 0.85rem;
    padding: 30px 25px;
}
.view{
    background-color: #56dddd;
    width: 100px;
}
.alert.alert-success {
    position: absolute;
    top: 61px;
    left: 599px;
}
.boo{
    height: 61px;
    padding: 12px;
    display: flex;
    align-items: center;
}
.table-responsive {
    overflow-x: auto;
}
.table-bordered {
    position: relative !important;
    top: auto !important;
    left: auto !important;
    display: table !important;
    width: 100% !important;
    border-collapse: collapse !important;
}


  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark px-4 ">
    <a class="navbar-brand cont" id="content" href="{{ route('admin.dashboard') }}">WanderBit Admin</a>
    <div class="ms-auto">
        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-light btn-sm">Logout</button>
        </form>
    </div>
</nav>


<div class="content shrink" id="main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

<script>
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('main-content');
    const navbar = document.getElementById('top-nav');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('shrink');
        navbar.classList.toggle('expand');
    });
</script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
<script>
function deleteImage(button, index) {
    const form = document.getElementById('packageUpdateForm');
    if (!form) {
        alert('Update form not found');
        return;
    }

    // create hidden input
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'delete_images[]';
    input.value = index;

    form.appendChild(input);

    // UI feedback
    const wrapper = button.closest('.image-box');
    wrapper.style.opacity = '0.4';
    wrapper.style.pointerEvents = 'none';

    button.innerHTML = '✓';
    button.style.backgroundColor = '#28a745';
    button.disabled = true;
}
</script>

</body>
</html>
