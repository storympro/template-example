export default class App {};

declare global {
    interface Window { data: any; }
    interface Window { axios: any; }
    interface Window { BSN: any; }
}

// Тут можна писати код на TypeScript та підключати інші файли з TypeScript
// Перед початком роботи запускаємо cmd (командний рядок) та вводимо команду "npm run watch"