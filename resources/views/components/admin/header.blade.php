@php
    use App\Helpers\DateHelper;
@endphp
<div class="header">
    <div class="menu-mobile">
        <button class="btn btn-ghost open-menu" id="open-menu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="user-greeting">
            <div class="username">Hello, Elisame!</div>
            <div class="date">
                Today is {{ DateHelper::currentDate() }}
            </div>
            <div class="time">Now is <span id="clock"></span></div>
        </div>
        @include('components.admin.menu-mobile')
    </div>
    <div class="right-header">
        <div class="search-button tooltip tooltip-accent tooltip-bottom" data-tip="Pesquisar">
            <button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

        <div class="notifications">
            <button class="total-notificacoes" popovertarget="notifications" style="anchor-name:--notifications-anchor">
                <span class=" indicator-item badge badge-xs badge-primary">5</span>
                <i class="fa-regular fa-bell"></i>
            </button>
            <ul class="drop-content" popover id="notifications" style="position-anchor:--notifications-anchor">
                <div class="notification-item">
                    <div class="notification-header">
                        <i class="fa-solid fa-comment"></i> Novo Comentário
                    </div>
                    <div class="notification-content">
                        <span class="username">@nomeusuario</span> comentou no post [Nome do Post]
                        há 2 horas
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-header">
                        <i class="fa-solid fa-message"></i> Nova Mensagem
                    </div>
                    <div class="notification-content">
                        <span class="username">Fernando Otávio</span> mandou uma mensagem há 2 horas
                    </div>
                </div>

                <div class="notification-item">
                    <div class="notification-header">
                        <i class="fa-solid fa-compact-disc"></i> Nova Análise
                    </div>
                    <div class="notification-content">
                        <span class="username">Cristiano Araújo</span> analisou o álbum [Nome do
                        Álbum] há 2 horas
                    </div>
                </div>

                <div class="notification-item">
                    <div class="notification-header">
                        <i class="fa-solid fa-shuffle"></i> Nova Análise
                    </div>
                    <div class="notification-content">
                        <span class="username">Cristiano Araújo</span> analisou a faixa [Nome da
                        Faixa] há 2 horas
                    </div>
                </div>

                <footer class="dropdown-footer">
                    <a href="#">Ver todas as notificações</a>
                </footer>

            </ul>
        </div>

        <section class="theme-selector tooltip tooltip-accent tooltip-left" data-tip="Modo Claro/Escuro">
            <label>
                <!-- input que gerencia os estados claro/escuro -->
                <input type="checkbox" value="ahh" data-toggle-theme="dark,light" data-act-class="ACTIVECLASS" />

                <!-- ícone de sol -->
                <i class="fa-regular fa-sun swap-off h-10 w-10"></i>

                <!-- ícone de lua -->
                <i class="fa-regular fa-moon swap-on h-10 w-10"></i>

            </label>
        </section>


    </div>
</div>