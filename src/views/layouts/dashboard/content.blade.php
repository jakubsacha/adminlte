<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php $icon = end($breadcrumb)['icon']; ?>
            <i class="<?php echo (strpos($icon,'fa-')!==false)?'fa':'glyphicon '; ?> {{$icon}}"></i>
            {{end($breadcrumb)['title']}}
        </h1>
        {{ isset($breadcrumb) ? \Jakubsacha\Adminlte\Helpers\Breadcrumbs::create($breadcrumb) : ''; }}
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section><!-- /.content -->
</aside><!-- /.right-side -->