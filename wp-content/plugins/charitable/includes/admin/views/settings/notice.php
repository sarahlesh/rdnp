<?php
/**
 * Display notice in settings area.
 *
 * @author  Studio 164a
 * @package Charitable/Admin Views/Settings
 * @since   1.2.0
 */

$notice_type = isset( $view_args[ 'notice_type' ] ) ? $view_args[ 'notice_type' ] : 'error';

?>
<div class="notice <?php echo $notice_type ?>">
    <p><?php echo $view_args[ 'content' ] ?></p>
</div>