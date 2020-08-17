<?php
$zanbil_page_hotdeals = zanbil_options()->getCpanelValue('hot_deals');
?>
<div id="header" class="header-style3 newheader">
    <div class="yt-header-middle">
        <div class="container das">
            <div class="row">
                <div class="col-lg-5 col-md-5 logo-wrapper">
                    <?php wp_nav_menu(array('theme_location' => 'stlye3_menu', 'menu_class' => 'head_menu' ,'depth'=> 1)); ?>
                </div>
				<div class="col-lg-2 col-md-2 logo-wrapper">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_attr(zanbil_options()->getCpanelValue('sitelogo')); ?>"
                                 alt="<?php bloginfo('name'); ?>" width="201" height="62"/>
                        </a>
                    </div>
                </div>
				

			
                <div class="col-lg-5 col-md-5 yt-searchbox">
                    <div class="header_button_A">
						<a href="<?php echo esc_url(tm_woocompare_get_page_link()) ?>" title="لیست مقایسه"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyLjAwMSA1MTIuMDAxIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIuMDAxIDUxMi4wMDE7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCQk8cGF0aCBkPSJNNDk2Ljk4NiwxMDMuODU0SDMyMi42MzFjLTEuODQ1LTQuMjk2LTQuNTE3LTguMzE5LTguMDItMTEuODIxbC0yNy41NTgtMjcuNTU4Yy03LjE2Ny03LjE2OC0xNi42OTgtMTEuMTE2LTI2LjgzNi0xMS4xMTYNCgkJCWMtMTAuMTM3LDAtMTkuNjY3LDMuOTQ4LTI2LjgzNiwxMS4xMTVsLTI3LjU1OCwyNy41NThjLTMuNTAyLDMuNTAyLTYuMTc1LDcuNTI1LTguMDIsMTEuODIxSDE1LjAxNQ0KCQkJQzYuNzIzLDEwMy44NTMsMCwxMTAuNTc1LDAsMTE4Ljg2N2MwLDguMjkyLDYuNzIzLDE1LjAxNiwxNS4wMTUsMTUuMDE2aDE4Mi43OWMxLjg0NSw0LjI5Niw0LjUxNyw4LjMxOSw4LjAyLDExLjgyMQ0KCQkJbDI3LjU1OCwyNy41NThjNy4xNjgsNy4xNjgsMTYuNjk5LDExLjExNSwyNi44MzYsMTEuMTE1YzEwLjEzOCwwLDE5LjY2OC0zLjk0OCwyNi44MzYtMTEuMTE1bDI3LjU1OC0yNy41NTgNCgkJCWMzLjUwMi0zLjUwMiw2LjE3NS03LjUyNSw4LjAyLTExLjgyMWgxNzQuMzU0YzguMjkyLDAsMTUuMDE1LTYuNzIzLDE1LjAxNS0xNS4wMTVTNTA1LjI3OSwxMDMuODU0LDQ5Ni45ODYsMTAzLjg1NHoNCgkJCSBNMjkzLjM3OSwxMjQuNDcybC0yNy41NTgsMjcuNTU4Yy0xLjQ5NiwxLjQ5Ni0zLjQ4NSwyLjMyLTUuNjAyLDIuMzJjLTIuMTE3LDAtNC4xMDYtMC44MjQtNS42MDItMi4zMmwtMjcuNTU4LTI3LjU1OA0KCQkJYy0zLjA4OS0zLjA5LTMuMDg5LTguMTE2LDAtMTEuMjA1bDI3LjU1OC0yNy41NTdjMS40OTYtMS40OTYsMy40ODUtMi4zMiw1LjYwMi0yLjMyYzIuMTE3LDAsNC4xMDYsMC44MjQsNS42MDIsMi4zMg0KCQkJbDI3LjU1OCwyNy41NThDMjk2LjQ2OCwxMTYuMzU3LDI5Ni40NjgsMTIxLjM4MywyOTMuMzc5LDEyNC40NzJ6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00OTYuOTg1LDI0Mi45ODlIMjA0LjEwOWMtMS44NzgtNC4zNTgtNC41ODUtOC4zNjUtOC4wNDItMTEuODIxbC0yNy41NTctMjcuNTU4DQoJCQljLTcuMTY4LTcuMTY4LTE2LjY5OS0xMS4xMTUtMjYuODM2LTExLjExNWMtMTAuMTM4LDAtMTkuNjY4LDMuOTQ4LTI2LjgzNiwxMS4xMTVsLTI3LjU1OCwyNy41NTgNCgkJCWMtMy41MDIsMy41MDItNi4xNzUsNy41MjUtOC4wMiwxMS44MjFIMTUuMDE1QzYuNzIzLDI0Mi45ODksMCwyNDkuNzExLDAsMjU4LjAwM3M2LjcyMywxNS4wMTUsMTUuMDE1LDE1LjAxNWg2NC4yNDcNCgkJCWMxLjg0NSw0LjI5Niw0LjUxNyw4LjMxOSw4LjAyLDExLjgyMWwyNy41NTgsMjcuNTU4YzcuMTY3LDcuMTY4LDE2LjY5OCwxMS4xMTYsMjYuODM2LDExLjExNg0KCQkJYzEwLjEzNywwLDE5LjY2Ny0zLjk0OCwyNi44MzYtMTEuMTE2bDI3LjU1Ny0yNy41NTdjMy40NTYtMy40NTYsNi4xNjQtNy40NjMsOC4wNDItMTEuODIxaDI5Mi44NzYNCgkJCWM4LjI5MiwwLDE1LjAxNS02LjcyMywxNS4wMTUtMTUuMDE1QzUxMi4wMDEsMjQ5LjcxMiw1MDUuMjc3LDI0Mi45ODksNDk2Ljk4NSwyNDIuOTg5eiBNMTc0LjgzNCwyNjMuNjA2bC0yNy41NTcsMjcuNTU3DQoJCQljLTEuNDk2LDEuNDk2LTMuNDg1LDIuMzItNS42MDIsMi4zMmMtMi4xMTcsMC00LjEwNi0wLjgyNC01LjYwMi0yLjMybC0yNy41NTgtMjcuNTU4Yy0zLjA4OS0zLjA4OS0zLjA4OS04LjExNSwwLTExLjIwNA0KCQkJbDI3LjU1OC0yNy41NThjMS40OTYtMS40OTYsMy40ODUtMi4zMiw1LjYwMi0yLjMyYzIuMTE3LDAsNC4xMDYsMC44MjQsNS42MDIsMi4zMmwyNy41NTcsMjcuNTU4DQoJCQljMS40OTYsMS40OTYsMi4zMiwzLjQ4NSwyLjMyLDUuNjAxQzE3Ny4xNTQsMjYwLjExOSwxNzYuMzMsMjYyLjEwOSwxNzQuODM0LDI2My42MDZ6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00OTYuOTg1LDM3OC4xMmgtNzQuMjU3Yy0xLjg0NS00LjI5Ni00LjUxNy04LjMxOS04LjAyLTExLjgyMWwtMjcuNTU4LTI3LjU1OGMtNy4xNjctNy4xNjgtMTYuNjk4LTExLjExNi0yNi44MzYtMTEuMTE2DQoJCQljLTEwLjEzNywwLTE5LjY2NywzLjk0OC0yNi44MzYsMTEuMTE1bC0yNy41NTgsMjcuNTU4Yy0zLjUwMiwzLjUwMi02LjE3NSw3LjUyNS04LjAyLDExLjgyMUgxNS4wMTUNCgkJCUM2LjcyMywzNzguMTE5LDAsMzg0Ljg0MiwwLDM5My4xMzRjMCw4LjI5Miw2LjcyMywxNS4wMTUsMTUuMDE1LDE1LjAxNWgyODIuODg4YzEuODQ1LDQuMjk2LDQuNTE3LDguMzE5LDguMDIsMTEuODIxDQoJCQlsMjcuNTU4LDI3LjU1OGM3LjE2OCw3LjE2OCwxNi42OTksMTEuMTE1LDI2LjgzNiwxMS4xMTVjMTAuMTM4LDAsMTkuNjY4LTMuOTQ4LDI2LjgzNi0xMS4xMTVsMjcuNTU4LTI3LjU1OA0KCQkJYzMuNTAyLTMuNTAyLDYuMTc1LTcuNTI1LDguMDItMTEuODIxaDc0LjI1N2M4LjI5MiwwLDE1LjAxNS02LjcyMywxNS4wMTUtMTUuMDE1QzUxMi4wMDEsMzg0Ljg0Miw1MDUuMjc3LDM3OC4xMiw0OTYuOTg1LDM3OC4xMnoNCgkJCSBNMzkzLjQ3NiwzOTguNzM3bC0yNy41NTgsMjcuNTU4Yy0xLjQ5NiwxLjQ5Ni0zLjQ4NSwyLjMyLTUuNjAyLDIuMzJjLTIuMTE3LDAtNC4xMDYtMC44MjQtNS42MDItMi4zMmwtMjcuNTU4LTI3LjU1OA0KCQkJYy0zLjA4OS0zLjA4OS0zLjA4OS04LjExNSwwLTExLjIwNGwyNy41NTgtMjcuNTU3YzEuNDk2LTEuNDk2LDMuNDg1LTIuMzIsNS42MDItMi4zMmMyLjExNywwLDQuMTA2LDAuODI0LDUuNjAyLDIuMzINCgkJCWwyNy41NTgsMjcuNTU4QzM5Ni41NjUsMzkwLjYyMiwzOTYuNTY1LDM5NS42NDgsMzkzLjQ3NiwzOTguNzM3eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K" /></a>
						<a href="<?php echo esc_url(tm_woowishlist_get_page_link()) ?>" title="لیست علاقه مندی ها"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIC0yOCA1MTIuMDAxIDUxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtMjU2IDQ1NS41MTU2MjVjLTcuMjg5MDYyIDAtMTQuMzE2NDA2LTIuNjQwNjI1LTE5Ljc5Mjk2OS03LjQzNzUtMjAuNjgzNTkzLTE4LjA4NTkzNy00MC42MjUtMzUuMDgyMDMxLTU4LjIxODc1LTUwLjA3NDIxOWwtLjA4OTg0My0uMDc4MTI1Yy01MS41ODIwMzItNDMuOTU3MDMxLTk2LjEyNS04MS45MTc5NjktMTI3LjExNzE4OC0xMTkuMzEyNS0zNC42NDQ1MzEtNDEuODA0Njg3LTUwLjc4MTI1LTgxLjQ0MTQwNi01MC43ODEyNS0xMjQuNzQyMTg3IDAtNDIuMDcwMzEzIDE0LjQyNTc4MS04MC44ODI4MTMgNDAuNjE3MTg4LTEwOS4yOTI5NjkgMjYuNTAzOTA2LTI4Ljc0NjA5NCA2Mi44NzEwOTMtNDQuNTc4MTI1IDEwMi40MTQwNjItNDQuNTc4MTI1IDI5LjU1NDY4OCAwIDU2LjYyMTA5NCA5LjM0Mzc1IDgwLjQ0NTMxMiAyNy43Njk1MzEgMTIuMDIzNDM4IDkuMzAwNzgxIDIyLjkyMTg3NiAyMC42ODM1OTQgMzIuNTIzNDM4IDMzLjk2MDkzOCA5LjYwNTQ2OS0xMy4yNzczNDQgMjAuNS0yNC42NjAxNTcgMzIuNTI3MzQ0LTMzLjk2MDkzOCAyMy44MjQyMTgtMTguNDI1NzgxIDUwLjg5MDYyNS0yNy43Njk1MzEgODAuNDQ1MzEyLTI3Ljc2OTUzMSAzOS41MzkwNjMgMCA3NS45MTAxNTYgMTUuODMyMDMxIDEwMi40MTQwNjMgNDQuNTc4MTI1IDI2LjE5MTQwNiAyOC40MTAxNTYgNDAuNjEzMjgxIDY3LjIyMjY1NiA0MC42MTMyODEgMTA5LjI5Mjk2OSAwIDQzLjMwMDc4MS0xNi4xMzI4MTIgODIuOTM3NS01MC43NzczNDQgMTI0LjczODI4MS0zMC45OTIxODcgMzcuMzk4NDM3LTc1LjUzMTI1IDc1LjM1NTQ2OS0xMjcuMTA1NDY4IDExOS4zMDg1OTQtMTcuNjI1IDE1LjAxNTYyNS0zNy41OTc2NTcgMzIuMDM5MDYyLTU4LjMyODEyNiA1MC4xNjc5NjktNS40NzI2NTYgNC43ODkwNjItMTIuNTAzOTA2IDcuNDI5Njg3LTE5Ljc4OTA2MiA3LjQyOTY4N3ptLTExMi45Njg3NS00MjUuNTIzNDM3Yy0zMS4wNjY0MDYgMC01OS42MDU0NjkgMTIuMzk4NDM3LTgwLjM2NzE4OCAzNC45MTQwNjItMjEuMDcwMzEyIDIyLjg1NTQ2OS0zMi42NzU3ODEgNTQuNDQ5MjE5LTMyLjY3NTc4MSA4OC45NjQ4NDQgMCAzNi40MTc5NjggMTMuNTM1MTU3IDY4Ljk4ODI4MSA0My44ODI4MTMgMTA1LjYwNTQ2OCAyOS4zMzIwMzEgMzUuMzk0NTMyIDcyLjk2MDkzNyA3Mi41NzQyMTkgMTIzLjQ3NjU2MiAxMTUuNjI1bC4wOTM3NS4wNzgxMjZjMTcuNjYwMTU2IDE1LjA1MDc4MSAzNy42Nzk2ODggMzIuMTEzMjgxIDU4LjUxNTYyNSA1MC4zMzIwMzEgMjAuOTYwOTM4LTE4LjI1MzkwNyA0MS4wMTE3MTktMzUuMzQzNzUgNTguNzA3MDMxLTUwLjQxNzk2OSA1MC41MTE3MTktNDMuMDUwNzgxIDk0LjEzNjcxOS04MC4yMjI2NTYgMTIzLjQ2ODc1LTExNS42MTcxODggMzAuMzQzNzUtMzYuNjE3MTg3IDQzLjg3ODkwNy02OS4xODc1IDQzLjg3ODkwNy0xMDUuNjA1NDY4IDAtMzQuNTE1NjI1LTExLjYwNTQ2OS02Ni4xMDkzNzUtMzIuNjc1NzgxLTg4Ljk2NDg0NC0yMC43NTc4MTMtMjIuNTE1NjI1LTQ5LjMwMDc4Mi0zNC45MTQwNjItODAuMzYzMjgyLTM0LjkxNDA2Mi0yMi43NTc4MTIgMC00My42NTIzNDQgNy4yMzQzNzQtNjIuMTAxNTYyIDIxLjUtMTYuNDQxNDA2IDEyLjcxODc1LTI3Ljg5NDUzMiAyOC43OTY4NzQtMzQuNjA5Mzc1IDQwLjA0Njg3NC0zLjQ1MzEyNSA1Ljc4NTE1Ny05LjUzMTI1IDkuMjM4MjgyLTE2LjI2MTcxOSA5LjIzODI4MnMtMTIuODA4NTk0LTMuNDUzMTI1LTE2LjI2MTcxOS05LjIzODI4MmMtNi43MTA5MzctMTEuMjUtMTguMTY0MDYyLTI3LjMyODEyNC0zNC42MDkzNzUtNDAuMDQ2ODc0LTE4LjQ0OTIxOC0xNC4yNjU2MjYtMzkuMzQzNzUtMjEuNS02Mi4wOTc2NTYtMjEuNXptMCAwIi8+PC9zdmc+" /></a>
						<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="حساب کاربری"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSItNDIgMCA1MTIgNTEyLjAwMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtMjEwLjM1MTU2MiAyNDYuNjMyODEyYzMzLjg4MjgxMyAwIDYzLjIxODc1LTEyLjE1MjM0MyA4Ny4xOTUzMTMtMzYuMTI4OTA2IDIzLjk2ODc1LTIzLjk3MjY1NiAzNi4xMjUtNTMuMzA0Njg3IDM2LjEyNS04Ny4xOTE0MDYgMC0zMy44NzUtMTIuMTUyMzQ0LTYzLjIxMDkzOC0zNi4xMjg5MDYtODcuMTkxNDA2LTIzLjk3NjU2My0yMy45Njg3NS01My4zMTI1LTM2LjEyMTA5NC04Ny4xOTE0MDctMzYuMTIxMDk0LTMzLjg4NjcxOCAwLTYzLjIxODc1IDEyLjE1MjM0NC04Ny4xOTE0MDYgMzYuMTI1cy0zNi4xMjg5MDYgNTMuMzA4NTk0LTM2LjEyODkwNiA4Ny4xODc1YzAgMzMuODg2NzE5IDEyLjE1NjI1IDYzLjIyMjY1NiAzNi4xMjg5MDYgODcuMTk1MzEyIDIzLjk4MDQ2OSAyMy45Njg3NSA1My4zMTY0MDYgMzYuMTI1IDg3LjE5MTQwNiAzNi4xMjV6bS02NS45NzI2NTYtMTg5LjI5Mjk2OGMxOC4zOTQ1MzItMTguMzk0NTMyIDM5Ljk3MjY1Ni0yNy4zMzU5MzggNjUuOTcyNjU2LTI3LjMzNTkzOCAyNS45OTYwOTQgMCA0Ny41NzgxMjYgOC45NDE0MDYgNjUuOTc2NTYzIDI3LjMzNTkzOCAxOC4zOTQ1MzEgMTguMzk4NDM3IDI3LjMzOTg0NCAzOS45ODA0NjggMjcuMzM5ODQ0IDY1Ljk3MjY1NiAwIDI2LTguOTQ1MzEzIDQ3LjU3ODEyNS0yNy4zMzk4NDQgNjUuOTc2NTYyLTE4LjM5ODQzNyAxOC4zOTg0MzgtMzkuOTgwNDY5IDI3LjMzOTg0NC02NS45NzY1NjMgMjcuMzM5ODQ0LTI1Ljk5MjE4NyAwLTQ3LjU3MDMxMi04Ljk0NTMxMi02NS45NzI2NTYtMjcuMzM5ODQ0LTE4LjM5ODQzNy0xOC4zOTQ1MzEtMjcuMzQzNzUtMzkuOTc2NTYyLTI3LjM0Mzc1LTY1Ljk3NjU2MiAwLTI1Ljk5MjE4OCA4Ljk0NTMxMy00Ny41NzQyMTkgMjcuMzQzNzUtNjUuOTcyNjU2em0wIDAiLz48cGF0aCBkPSJtNDI2LjEyODkwNiAzOTMuNzAzMTI1Yy0uNjkxNDA2LTkuOTc2NTYzLTIuMDg5ODQ0LTIwLjg1OTM3NS00LjE0ODQzNy0zMi4zNTE1NjMtMi4wNzgxMjUtMTEuNTc4MTI0LTQuNzUzOTA3LTIyLjUyMzQzNy03Ljk1NzAzMS0zMi41MjczNDMtMy4zMTI1LTEwLjMzOTg0NC03LjgwODU5NC0yMC41NTA3ODEtMTMuMzc1LTMwLjMzNTkzOC01Ljc2OTUzMi0xMC4xNTYyNS0xMi41NTA3ODItMTktMjAuMTYwMTU3LTI2LjI3NzM0My03Ljk1NzAzMS03LjYxMzI4Mi0xNy42OTkyMTktMTMuNzM0Mzc2LTI4Ljk2NDg0My0xOC4xOTkyMTktMTEuMjI2NTYzLTQuNDQxNDA3LTIzLjY2Nzk2OS02LjY5MTQwNy0zNi45NzY1NjMtNi42OTE0MDctNS4yMjY1NjMgMC0xMC4yODEyNSAyLjE0NDUzMi0yMC4wNDI5NjkgOC41LTYuMDA3ODEyIDMuOTE3OTY5LTEzLjAzNTE1NiA4LjQ0OTIxOS0yMC44Nzg5MDYgMTMuNDYwOTM4LTYuNzA3MDMxIDQuMjczNDM4LTE1Ljc5Mjk2OSA4LjI3NzM0NC0yNy4wMTU2MjUgMTEuOTAyMzQ0LTEwLjk0OTIxOSAzLjU0Mjk2OC0yMi4wNjY0MDYgNS4zMzk4NDQtMzMuMDQyOTY5IDUuMzM5ODQ0LTEwLjk2ODc1IDAtMjIuMDg1OTM3LTEuNzk2ODc2LTMzLjA0Mjk2OC01LjMzOTg0NC0xMS4yMTA5MzgtMy42MjEwOTQtMjAuMzAwNzgyLTcuNjI1LTI2Ljk5NjA5NC0xMS44OTg0MzgtNy43Njk1MzItNC45NjQ4NDQtMTQuODAwNzgyLTkuNDk2MDk0LTIwLjg5ODQzOC0xMy40Njg3NS05Ljc1MzkwNi02LjM1NTQ2OC0xNC44MDg1OTQtOC41LTIwLjAzNTE1Ni04LjUtMTMuMzEyNSAwLTI1Ljc1IDIuMjUzOTA2LTM2Ljk3MjY1NiA2LjY5OTIxOS0xMS4yNTc4MTMgNC40NTcwMzEtMjEuMDAzOTA2IDEwLjU3ODEyNS0yOC45Njg3NSAxOC4xOTkyMTktNy42MDkzNzUgNy4yODEyNS0xNC4zOTA2MjUgMTYuMTIxMDk0LTIwLjE1NjI1IDI2LjI3MzQzNy01LjU1ODU5NCA5Ljc4NTE1Ny0xMC4wNTg1OTQgMTkuOTkyMTg4LTEzLjM3MTA5NCAzMC4zMzk4NDQtMy4xOTkyMTkgMTAuMDAzOTA2LTUuODc1IDIwLjk0NTMxMy03Ljk1MzEyNSAzMi41MjM0MzctMi4wNjI1IDExLjQ3NjU2My0zLjQ1NzAzMSAyMi4zNjMyODItNC4xNDg0MzcgMzIuMzYzMjgyLS42Nzk2ODggOS43NzczNDQtMS4wMjM0MzggMTkuOTUzMTI1LTEuMDIzNDM4IDMwLjIzNDM3NSAwIDI2LjcyNjU2MiA4LjQ5NjA5NCA0OC4zNjMyODEgMjUuMjUgNjQuMzIwMzEyIDE2LjU0Njg3NSAxNS43NDYwOTQgMzguNDM3NSAyMy43MzA0NjkgNjUuMDY2NDA2IDIzLjczMDQ2OWgyNDYuNTMxMjVjMjYuNjIxMDk0IDAgNDguNTExNzE5LTcuOTg0Mzc1IDY1LjA2MjUtMjMuNzMwNDY5IDE2Ljc1NzgxMy0xNS45NDUzMTIgMjUuMjUzOTA2LTM3LjU4OTg0MyAyNS4yNTM5MDYtNjQuMzI0MjE5LS4wMDM5MDYtMTAuMzE2NDA2LS4zNTE1NjItMjAuNDkyMTg3LTEuMDM1MTU2LTMwLjI0MjE4N3ptLTQ0LjkwNjI1IDcyLjgyODEyNWMtMTAuOTMzNTk0IDEwLjQwNjI1LTI1LjQ0OTIxOCAxNS40NjQ4NDQtNDQuMzc4OTA2IDE1LjQ2NDg0NGgtMjQ2LjUyNzM0NGMtMTguOTMzNTk0IDAtMzMuNDQ5MjE4LTUuMDU4NTk0LTQ0LjM3ODkwNi0xNS40NjA5MzgtMTAuNzIyNjU2LTEwLjIwNzAzMS0xNS45MzM1OTQtMjQuMTQwNjI1LTE1LjkzMzU5NC00Mi41ODU5MzcgMC05LjU5Mzc1LjMxNjQwNi0xOS4wNjY0MDcuOTQ5MjE5LTI4LjE2MDE1Ny42MTcxODctOC45MjE4NzQgMS44Nzg5MDYtMTguNzIyNjU2IDMuNzUtMjkuMTM2NzE4IDEuODQ3NjU2LTEwLjI4NTE1NiA0LjE5OTIxOS0xOS45Mzc1IDYuOTk2MDk0LTI4LjY3NTc4MiAyLjY4MzU5My04LjM3ODkwNiA2LjM0Mzc1LTE2LjY3NTc4MSAxMC44ODI4MTItMjQuNjY3OTY4IDQuMzMyMDMxLTcuNjE3MTg4IDkuMzE2NDA3LTE0LjE1MjM0NCAxNC44MTY0MDctMTkuNDE3OTY5IDUuMTQ0NTMxLTQuOTI1NzgxIDExLjYyODkwNi04Ljk1NzAzMSAxOS4yNjk1MzEtMTEuOTgwNDY5IDcuMDY2NDA2LTIuNzk2ODc1IDE1LjAwNzgxMi00LjMyODEyNSAyMy42Mjg5MDYtNC41NTg1OTQgMS4wNTA3ODEuNTU4NTk0IDIuOTIxODc1IDEuNjI1IDUuOTUzMTI1IDMuNjAxNTYzIDYuMTY3OTY5IDQuMDE5NTMxIDEzLjI3NzM0NCA4LjYwNTQ2OSAyMS4xMzY3MTkgMTMuNjI1IDguODU5Mzc1IDUuNjQ4NDM3IDIwLjI3MzQzNyAxMC43NSAzMy45MTAxNTYgMTUuMTUyMzQ0IDEzLjk0MTQwNiA0LjUwNzgxMiAyOC4xNjAxNTYgNi43OTY4NzUgNDIuMjczNDM3IDYuNzk2ODc1IDE0LjExMzI4MiAwIDI4LjMzNTkzOC0yLjI4OTA2MyA0Mi4yNjk1MzItNi43OTI5NjkgMTMuNjQ4NDM3LTQuNDEwMTU2IDI1LjA1ODU5NC05LjUwNzgxMyAzMy45Mjk2ODctMTUuMTY0MDYzIDguMDQyOTY5LTUuMTQwNjI0IDE0Ljk1MzEyNS05LjU5Mzc1IDIxLjEyMTA5NC0xMy42MTcxODcgMy4wMzEyNS0xLjk3MjY1NiA0LjkwMjM0NC0zLjA0Mjk2OSA1Ljk1MzEyNS0zLjYwMTU2MyA4LjYyNS4yMzA0NjkgMTYuNTY2NDA2IDEuNzYxNzE5IDIzLjYzNjcxOSA0LjU1ODU5NCA3LjYzNjcxOSAzLjAyMzQzOCAxNC4xMjEwOTMgNy4wNTg1OTQgMTkuMjY1NjI1IDExLjk4MDQ2OSA1LjUgNS4yNjE3MTkgMTAuNDg0Mzc1IDExLjc5Njg3NSAxNC44MTY0MDYgMTkuNDIxODc1IDQuNTQyOTY5IDcuOTg4MjgxIDguMjA3MDMxIDE2LjI4OTA2MiAxMC44ODY3MTkgMjQuNjYwMTU2IDIuODAwNzgxIDguNzUgNS4xNTYyNSAxOC4zOTg0MzggNyAyOC42NzU3ODIgMS44NjcxODcgMTAuNDMzNTkzIDMuMTMyODEyIDIwLjIzODI4MSAzLjc1IDI5LjE0NDUzMXYuMDA3ODEyYy42MzY3MTkgOS4wNTg1OTQuOTU3MDMxIDE4LjUyNzM0NC45NjA5MzcgMjguMTQ4NDM4LS4wMDM5MDYgMTguNDQ5MjE5LTUuMjE0ODQ0IDMyLjM3ODkwNi0xNS45Mzc1IDQyLjU4MjAzMXptMCAwIi8+PC9zdmc+" /></a>
						<div class="mini-cart-header"><?php get_template_part('woocommerce/minicart-ajax'); ?></div>
					</div>

                </div>
            </div>
        </div>
        <div class="yt-header-under-2">
            <div class="container">
                <div class="row yt-header-under-wrap">
                    <div class="yt-main-menu col-md-12">
                        <div class="header-under-2-wrapper">

                            <div class="yt-searchbox-vermenu">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 vertical-mega">
                                        <div class="search-pro">
										<a class="phone-icon-search  fa fa-search" href="#"
										   title="<?php esc_attr_e('Search', 'zanbil') ?>"></a>
										<div id="sm_serachbox_pro" class="sm-serachbox-pro">

											<div class="sm-searbox-content">
												<?php get_template_part('widgets/zanbil_top/searchcate'); ?>

											</div>
										</div>
										</div>
                                    </div>

                                    <div class="yt-header-under col-lg-6 col-md-6 no-padding-l">
                                        <?php if (has_nav_menu('primary_menu')) { ?>
                                            <nav id="primary-menu">
                                                <div class="yt-menu">
                                                    <div class="navbar-inner navbar-inverse">
                                                        <?php
                                                        $menu_class = 'nav nav-pills';
                                                        if ('mega' == zanbil_options()->getCpanelValue('menu_type')) {
                                                            $menu_class .= ' nav-mega';
                                                        } else $menu_class .= ' nav-css';
                                                        ?>
                                                        <?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $menu_class)); ?>
                                                    </div>
                                                </div>
                                            </nav>
                                        <?php } ?>
        

                                    </div>
									<div class="col-lg-3 col-md-3 left_2_2 ">
									                                        <!-- MiniCart -->
                                        <div class="mini-cart-header hidden">
                                            <?php get_template_part('woocommerce/minicart-ajax'); ?>
                                        </div>
									<?php
									if ($zanbil_page_hotdeals != '' && get_page($zanbil_page_hotdeals) != NULL):
										$zanbil_pagedeal = get_page($zanbil_page_hotdeals);
										?>
										<div class="menu-hotdeals hidden-sm hidden-xs">
											<a class="custom-font"
											   href="<?php echo get_page_link($zanbil_page_hotdeals); ?>">
												<?php echo $zanbil_pagedeal->post_title; ?>
											</a>
										</div>
									<?php endif ?>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>