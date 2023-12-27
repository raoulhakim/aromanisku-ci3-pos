<?php
function checkLogin()
{
    $CI =& get_instance();
    $user_session = $CI->session->userdata('id_user');
    if ($user_session) {
        redirect('dashboard');
    }
}
function checkNotLogin()
{
    $CI =& get_instance();
    $user_session = $CI->session->userdata('id_user');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function checkAdmin()
{
    $CI =& get_instance();
    $CI->load->library('fungsi');
    if ($CI->fungsi->userLogin()->level_user != 1) {
        redirect('dashboard');
    }
}

function indo_currency($value)
{
    return 'Rp. ' . number_format($value, 0, ",", ".");
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '-' . $m . '-' . $y;
}
?>