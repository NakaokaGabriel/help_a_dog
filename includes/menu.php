<nav id="menu" data-menu="mainMenu">
    <div class="container">
        <div class="menu">
            <div class="inside-menu">
                <div class="logo">
                    <a href="./">
                        <svg viewBox="0 0 1084.16 290.17">
                            <path d="M153.01-.01C68.5-.01.01 65.07.01 145.35c0 48.78 25.32 91.91 64.12 118.28 7.55-11 16.21-23 25-36.71 2.15-3.36 4.44-7.38 6.73-11.78q.86-1.65 1.72-3.36l.89-1.79a217.09 217.09 0 0 0 13.31-33.6l8.64-33.15 29.93-7.3-14.64 18.18h26.45l17.14 15.6 24.16-.2 10.76 10.13-10.83 27.8h-41.23l-6.06-3.23-3 7.59-1.94 4.87-1.65 4.15 12.65 50.22 3.82 19.13c78.45-6.25 140.08-68.67 140.08-144.81C306.03 65.09 237.52-.01 153.01-.01zm42.08 91.91h-28.93v28.92h-25.15V91.91h-28.92V66.76h28.92V37.84h25.15v28.92h28.93z"/>
                            <text transform="translate(340.95 188.66)" font-size="146.88" font-family="Righteous-Regular,Righteous" letter-spacing="-.01em" style="font-family: 'Righteous'">Help a Dog</text>
                        </svg>
                    </a>
                </div>
                <div class="menu-mobile" data-menu="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="list" data-menu="list">
                <ul>
                    <li><a href="./" <?= (($sPaginaAtual == 'index') ? ' class="on" ' : '') ?>>HOME</a></li>
                    <li><a href="doacao" <?= (($sPaginaAtual == 'doacao') ? 'class="on" ' : '') ?>>DOAÇÃO</a></li>
                    <li><a href="adocao" <?= (($sPaginaAtual == 'adocao' OR $sPaginaAtual == 'pesquisa' OR $sPaginaAtual == 'filtro' OR $sPaginaAtual == 'detalhe') ? 'class="on" ' : '') ?>>ADOÇÃO</a></li>
                    <li><a href="contato" <?= (($sPaginaAtual == 'contato') ? 'class="on" ' : '') ?>>CONTATO</a></li>
                    <li><a href="sobre" <?= (($sPaginaAtual == 'sobre') ? 'class="on" ' : '') ?>>SOBRE</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>