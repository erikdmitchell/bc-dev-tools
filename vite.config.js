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
        entryFileNames: 'assets/[name].js',
        assetFileNames: 'assets/[name][extname]',
      },
    },
    outDir: 'dist',        // or 'assets' directly
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