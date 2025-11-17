/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  safelist: [
    'bg-green-100', 'text-green-800',
    'bg-yellow-100', 'text-yellow-800',
    'bg-red-100', 'text-red-800',
    'bg-gray-100', 'text-gray-800',
    { pattern: /text-blue-/ },
    { pattern: /border-blue-/ },
    { pattern: /shadow-blue-/ },
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
