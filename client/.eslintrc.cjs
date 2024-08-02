/* eslint-env node */
require('@rushstack/eslint-patch/modern-module-resolution');

module.exports = {
  root: true,
  extends: [
    'plugin:vue/vue3-strongly-recommended',
    'eslint:recommended'
  ],
  parserOptions: {
    ecmaVersion: 'latest',
  },
  rules: {
    semi: ['error', 'always'],
    quotes: ['error', 'single'],
    ident: ['error', 2],
    'comma-spacing': ['error', {before: false, after: true}]
  }
};
