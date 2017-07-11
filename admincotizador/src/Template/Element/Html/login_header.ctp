<!-- HEADER -->
<header>
    <!-- NAV-BAR -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="logo">
                    <?php
                    echo $this->Html->link(''
                        . $this->Html->image('asic_logo.png', [
                            'alt' => 'Asic',
                            'style' => 'height:40;width:180px !important;'
                        ])
                        , ['controller' => 'Mains', 'action' => 'index']
                        , ['escape' => false]
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--/NAV-BAR -->
</header>
<!--/HEADER -->