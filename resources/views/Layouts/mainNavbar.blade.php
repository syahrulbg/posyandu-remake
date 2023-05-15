<li class="nav-item menu-items">
  <a class="nav-link" href="/">
    <span class="menu-icon">
      <i class="mdi mdi-home"></i>
    </span>
    <span class="menu-title">Home</span>
  </a>
</li>
@if ($user->role_id == "1")
  <li class="nav-item menu-items">
    <a class="nav-link" href="/data-anak">
      <span class="menu-icon">
        <i class="mdi mdi-human-child"></i>
      </span>
      <span class="menu-title">Data Anak</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="/data-ibu">
      <span class="menu-icon">
        <i class="mdi mdi-human-female"></i>
      </span>
      <span class="menu-title">Data Ibu</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="/penimbangan">
      <span class="menu-icon">
        <i class="mdi mdi-scale-balance"></i>
      </span>
      <span class="menu-title">penimbangan</span>
    </a>
  </li>
  @endif
  @if ($user->role_id == "2")
  <li class="nav-item menu-items">
    <a class="nav-link" href="/balita/{{$user->ibu_id}}">
      <span class="menu-icon">
        <i class="mdi mdi-human-child"></i>
      </span>
      <span class="menu-title">Data Anak</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="/ibu/{{$user->ibu_id}}">
      <span class="menu-icon">
        <i class="mdi mdi-human-female"></i>
      </span>
      <span class="menu-title">Data Ibu</span>
    </a>
  </li>
  <li class="nav-item menu-items">
    <a class="nav-link" href="/pemeriksaan/{{$user->ibu_id}}">
      <span class="menu-icon">
        <i class="mdi mdi-scale-balance"></i>
      </span>
      <span class="menu-title">Pemeriksaan</span>
    </a>
  </li>
  @endif
  <li class="nav-item menu-items">
    <a class="nav-link" href="/kalender">
      <span class="menu-icon">
        <i class="mdi mdi-calendar-clock"></i>
      </span>
      <span class="menu-title">Kalender</span>
    </a>
  </li>