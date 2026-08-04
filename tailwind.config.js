/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1E3A8A',
        secondary: '#4B5563',
        tertiary: '#DC2626',
        neutral: '#F8FAFC',
        surface: '#FFFFFF',
        'on-primary': '#FFFFFF',
      },
      fontFamily: {
        display: ['Merriweather', 'serif'],
        body: ['Inter', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
