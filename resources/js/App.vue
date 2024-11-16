<template>
    <div id="app">
      <nav>
        <router-link to="/example">Example</router-link>
        <router-link to="/child">Child</router-link>
      </nav>
      <router-view></router-view>
    </div>

  </template>
  
  <style>
  nav {
    display: flex;
    gap: 10px;
  }
  
  router-link {
    text-decoration: none;
    color: blue;
  }
  
  router-link.active {
    font-weight: bold;
    color: red;
  }
  </style>
  