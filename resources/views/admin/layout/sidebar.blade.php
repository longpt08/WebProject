<!--**********************************
            Sidebar start
        ***********************************-->
<?php
    $user = session()->get('user');
    echo $user->roles
?>
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="/admin/index" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">TRANG CHỦ</span>
                </a>
            </li>
            @if($user->roles == \App\Http\Enums\UserRole::ADMIN)
            <li>
                <a class="has-arrow" href="/admin/user" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text">NGƯỜI DÙNG</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="/admin/category" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">DANH MỤC</span>
                </a>
            </li>
            @endif
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="/admin/product" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">SẢN PHẨM</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="/admin/invoice" aria-expanded="false">
                    <i class="icon-paper-clip menu-icon"></i><span class="nav-text">HÓA ĐƠN</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="/admin/order" aria-expanded="false">
                    <i class="icon-paper-plane menu-icon"></i> <span class="nav-text">ĐƠN HÀNG</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="/admin/comment" aria-expanded="false">
                    <i class="icon-bubbles menu-icon"></i><span class="nav-text">ĐÁNH GIÁ VÀ BÌNH LUẬN</span>
                </a>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
