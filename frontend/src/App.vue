<template>
  <div id="app" class="container">
    <router-view/>
  </div>
</template>

<style>
:root{
  --bs-primary: #714ff9;
  --bs-primary-hover: #5939d8;
  --bs-muted: #f6f3fe;
  --bs-bgcard: #fafafa;
}
html, body {
  border-top: 3px solid var(--bs-primary);
  background: var(--bs-muted);
  font-family: 'Ubuntu', sans-serif;
}
.bg-primary {
  background-color: var(--bs-primary) !important;
}
.custom-card.bg-muted {
    background: #f6f3fe;
    color: #c4bed2;
    border-color: #edebf3;
    box-shadow: none;
}
.custom-card.bg-muted .badge{
  background-color: #c4bed4 !important;
}
.btn-primary {
  background-color: var(--bs-primary);
  border-color: var(--bs-primary-hover);
}

.btn-primary:hover {
  background-color: var(--bs-primary-hover);
  -moz-box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
    -webkit-box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
    box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
}
.form-title {
  font-size: 18px;
  margin-bottom: 20px;
}
.form-block {
  height: 100vh;
}
.custom-card {
  border-radius: 15px;
  border: 1px solid #fff;
  background-color: var(--bs-bgcard);
  -moz-box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
  -webkit-box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
  box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
}
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    margin-bottom: 20px;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    border: 1px solid #fff;
    border-radius: 8px;
    background-color: var(--bs-bgcard);
    -moz-box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
    -webkit-box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
    box-shadow: 0px 2px 18px rgba(234, 228, 254, 0.9);
}
.login-title
{
    color: #1b1233;
    font-size: 18px;
    font-weight: 600;
    display: block;
}
.brand {
  font-size: 30px;
  color: var(--bs-primary);
  text-transform: lowercase;
  font-weight: 600;
}
.brand span {
  font-weight: 200;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
</style>
