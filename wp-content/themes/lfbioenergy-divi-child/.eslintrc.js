module.exports = {
  root: true,

  env: {
    browser: true,
    commonjs: true,
    es2021: true,
    jest: true,
  },

  plugins: ['prettier'],

  extends: [
    'eslint:recommended',
    'plugin:react/recommended',
    'airbnb',
    'prettier',
  ],

  parser: '@babel/eslint-parser',
  parserOptions: {
    requireConfigFile: false,
    ecmaVersion: 12,
    sourceType: 'module',
    ecmaFeatures: {
      jsx: true,
    },
  },

  globals: {
    wpArgs: 'readonly',
    wp: true,
  },

  rules: {
    curly: ['error', 'all'],
    'spaced-comment': 'warn',
    'no-plusplus': ['error', { allowForLoopAfterthoughts: true }],
    'prettier/prettier': ['error'],
    'no-param-reassign': 0,
    'react/jsx-filename-extension': 'off',
    'react/react-in-jsx-scope': 'off',
    'react/function-component-definition': [
      'error',
      { namedComponents: 'arrow-function' },
    ],
    'import/prefer-default-export': 0,
    'arrow-body-style': 0,
    'jsx-a11y/label-has-associated-control': 0,
  },

  settings: {
    react: {
      version: 'detect',
    },
  },
};
