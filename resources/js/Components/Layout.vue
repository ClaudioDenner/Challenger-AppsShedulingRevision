<script setup>
import { Link } from '@inertiajs/vue3'


defineProps({ menu: Object })

</script>

<template>
  <main class="container flexCenterColumnColumn">
    <header class="nav ocultMobile">
        <div class="nav_cover">
        </div>
        <div class="nav_container_links flexCenterColumn">
            <Link href="/" :class="{ 'linkSelected': $page.url === '/', 'link':$page.url != '/' }">HOME</Link>
            <Link href="/clientes" :class="{ 'linkSelected': $page.url === '/clientes', 'link':$page.url != '/clientes' }">CLIENTES E CADASTROS</Link>
            <Link href="/veiculos" :class="{ 'linkSelected': $page.url === '/veiculos', 'link':$page.url != '/veiculos' }">LISTA DE VEICULOS</Link>
            <Link href="/agendamentos" :class="{ 'linkSelected': $page.url === '/agendamentos', 'link':$page.url != '/agendamentos' }">LISTA DE AGENDAMENTOS</Link>
            <Link href="/relatorios" :class="{ 'link linkSelected': $page.url === '/relatorios', 'link':$page.url != '/relatorios' }">RELATÓRIOS</Link>

        </div>
    </header>
    <article>
      <h1 class="logo_title">Sistema de <span class="logo_title_span">Revisão Veicular</span></h1>
      <slot />
    </article>
  </main>
</template>

