import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'src/main.js'),
        style: resolve(__dirname, 'src/style.scss'),
      },
      output: {
        entryFileNames: '[name].js',
        assetFileNames: '[name][extname]',
      },
    },
    outDir: 'assets',        // or 'assets' directly
    assetsDir: '',         // disables extra subfolder inside dist
    emptyOutDir: true,
  },
  css: {
    preprocessorOptions: {
      scss: {
        // optionally include global variables, etc.
      },
    },
  },
});

// vite.config.js
// export default {
//   build: {
//     outDir: 'assets',       // or whatever you want, like 'dist'
//     emptyOutDir: true,      // clears folder before each build
//     rollupOptions: {
//       input: 'src/main.js', // or multiple entry points
//     },
//   }
// };