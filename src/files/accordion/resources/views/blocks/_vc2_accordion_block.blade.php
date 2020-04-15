<?php
    $id = 'vc-accordion-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'vc-accordion';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
    if( $is_preview ) {
        $className .= ' is-admin';
    }

    $color = get_field('color');
    $padding_top = get_field('padding_top');
    $padding_bottom = get_field('padding_bottom');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="padding-top: {{$padding_top}}; padding-bottom: {{$padding_bottom}};">
    <div class="container">
        <div class="accordion-content">
            @if( have_rows('content_accordions') )
            <ul class="accordions">
                <?php while( have_rows('content_accordions') ): the_row(); 
                    $title_accordion = get_sub_field('title_accordion');
                ?>
                    <li class="accordion-menu">
                        <span class="heading" style="color: {{ $color }};"><span>{{ $title_accordion }}</span><i class="fa fa-angle-down"></i></span>
                        <div class="accordion-wrap">
                            <div class="nf-row row">
                                @if( have_rows('detail_accordions') )   
                                    <?php
                                    while( have_rows('detail_accordions') ): the_row(); 
                                        $course_name = get_sub_field('course_name');
                                        $begin_day = get_sub_field('begin_day');
                                        $duration = get_sub_field('duration');
                                        $schedule = get_sub_field('schedule');
                                        $time_class = get_sub_field('time_class');
                                    ?>
                                    <div class="nf-col col-lg-6 col-md-12">
                                        <ul class="accordion-child ">
                                            <li class="title">{{ $course_name }}</li>
                                            <li style="color: {{$color}}"><span class="name">{{ pll__('Khai giảng') }}</span> {{ $begin_day }}</li>
                                            <li style="color: {{$color}}"><span class="name">{{ pll__('Thời lượng') }}</span> {{ $duration }}</li>
                                            <li style="color: {{$color}}"><span class="name">{{ pll__('Lịch học') }}</span> {{ $schedule }}</li>
                                            <li style="color: {{$color}}"><span class="name">{{ pll__('Giờ học') }}</span> {{ $time_class }}</li>
                                        </ul>
                                    </div>
                                    <?php 
                                    endwhile ?> 
                                @endif
                            </div>
                        </div>
                    </li>  
                <?php endwhile ?>
            </ul>
            @endif
        </div>
    </div>
</div>