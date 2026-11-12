import { defineConfig } from 'tsup';

export default defineConfig({
    entry: { 'cad-viewer': 'resources/js/index.js' },
    outDir: 'resources/dist',
    format: ['esm'],
    outExtension: () => ({ js: '.js' }),
    clean: true,
    minify: true,
    sourcemap: false,
    noExternal: [/(.*)/],
});
