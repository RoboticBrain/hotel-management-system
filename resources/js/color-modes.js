
(() => {
  'use strict'

  const setTheme = theme => {
    document.documentElement.setAttribute('data-bs-theme', theme)
  }

  // Always set dark mode
  setTheme('dark')
})()
