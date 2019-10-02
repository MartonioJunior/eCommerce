<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">eCommerce</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarResponsive" style="">
      <ul class="navbar-nav ml-auto">
        @if(Auth::guard('client')->check())
          <li class="nav-item">
            <a class="nav-link" href="/client/profile">{{ Auth::guard('client')->user()->name }}</a>
          </li>
        @elseif(Auth::guard('admin')->check())
          <li class="nav-item">
            <a class="nav-link" href="/admin/profile">{{ Auth::guard('admin')->user()->name }}</a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/product">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart">Carrinho</a>
        </li>
        <li class="nav-item">
          @if(!Auth::check())
          <a class="nav-link" href="/login">
            Entrar
          @else
          <a class="nav-link" href="/logout">
            Sair
          @endif
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>