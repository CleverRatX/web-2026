// 1. Простые числа
function isPrimeNumber(value) {
  
  // Проверяем на не число и не массив
  if (typeof value !== 'number' && !Array.isArray(value)) {
    console.log('Ошибка: переданный параметр не является числом либо массивом')
    return
  }
 
  // Если число
  if (typeof value === 'number') {
    if (!Number.isInteger(value) || value <= 1) {
      console.log(value + ' не простое число')
      return
    }
 
    let isPrime = true
    for (let i = 2; i < value; i++) {
      if (value % i === 0) {
        isPrime = false
        break
      }
    }
 
    if (isPrime) {
      console.log(value + ' простое число')
    } else {
      console.log(value + ' не простое число')
    }
  }
 
  // Если массив
  if (Array.isArray(value)) {
    let primes = []
    let notPrimes = []
 
    for (let i = 0; i < value.length; i++) {
      let num = value[i]
 
      if (typeof num !== 'number') {
        console.log('Ошибка: элемент массива не является числом')
        return
      }
 
      if (num <= 1) {
        notPrimes.push(num)
        continue
      }
 
      let isPrime = true
      for (let j = 2; j < num; j++) {
        if (num % j === 0) {
          isPrime = false
          break
        }
      }
 
      if (isPrime) {
        primes.push(num)
      } else {
        notPrimes.push(num)
      }
    }
 
    let result = ''
    if (primes.length > 0) {
      result += primes.join(', ') + ' простые числа'
    }
    if (notPrimes.length > 0) {
      if (result !== '') result += ', '
      result += notPrimes.join(', ') + ' не простые числа'
    }
    console.log(result)
  }
}

/*
isPrimeNumber(7); // "7 простое число"
isPrimeNumber(8); // "8 не простое число"
isPrimeNumber([2, 3, 4, 5]); // "2, 3, 5 простые числа, 4 не простое число"
isPrimeNumber("не число"); // ошибка
*/

// 2. Подсчет гласных в строке
function countVowels(str) {
  if (typeof str !== 'string') {
    console.log('Ошибка: переданный параметр не является строкой')
    return 0
  } else {
    let vowels = 'аеёиоуыэюя'
    let count = 0
 
    for (let i = 0; i < str.length; i++) {
      let char = str[i].toLowerCase()
      if (vowels.includes(char)) {
        count++
      }
    }
 
    return count
  }
}

/*
console.log(countVowels("привет")); // 2
console.log(countVowels("москваа")); // 3
console.log(countVowels("")); // 0
console.log(countVowels(123)); // ошибка
*/

// 3. Уникальные элементы в массиве
function uniqueElements(arr) {
  if (!Array.isArray(arr)) {
    console.log('Ошибка: переданный параметр не является массивом')
    return {}
  } else {
    
    let result = {}
 
    for (let i = 0; i < arr.length; i++) {
      let key = String(arr[i])
 
      if (result[key] === undefined) {
        result[key] = 1
      } else {
        result[key]++
      }
    }
 
    return result
  }
}
/*
console.log(uniqueElements([1, 2, 2, 3, 3, 3])); // {1: 1, 2: 2, 3: 3}
console.log(uniqueElements(["a", "b", "a"])); // {a: 2, b: 1}
console.log(uniqueElements([])); // {}
console.log(uniqueElements("не массив")); // ошибка
*/

// 4. Объединение объектов
function mergeObjects(obj1, obj2) {
  if (typeof obj1 !== 'object' || typeof obj2 !== 'object') {
    console.log('Ошибка: оба параметра должны быть объектами')
    return {}
  }
 
  let result = {}
 
  // Сначала копируем все из первого объекта
  for (let key in obj1) {
    result[key] = obj1[key]
  }
 
  // Потом из второго
  for (let key in obj2) {
    result[key] = obj2[key]
  }
 
  return result
}

/*
console.log(mergeObjects({a: 1, b: 2}, {c: 3, d: 4})); // {a: 1, b: 2, c: 3, d: 4}
console.log(mergeObjects({a: 1, b: 2}, {b: 3, c: 4})); // {a: 1, b: 3, c: 4}
console.log(mergeObjects({}, {a: 1})); // {a: 1}
console.log(mergeObjects("не объект", {})); // ошибка
*/

// 5. Преобразование массива объектов
const users = [
  { id: 1, name: 'Alice' },
  { id: 2, name: 'Bob' },
  { id: 3, name: 'Charlie' },
  { id: 4, name: 'Yaroslav' }
];
const names = users.map(user => user.name);

/*
console.log(names);
*/

// 6. Метод map для объекта
function mapObject(obj, func) {
  if (typeof obj !== 'object' || typeof func !== 'function') {
    console.log('Ошибка: первый параметр объект, второй функция')
    return {}
  }
 
  let result = {}
 
  for (let key in obj) {
    result[key] = func(obj[key])
  }
 
  return result
}

/*
console.log(mapObject({a: 1, b: 2, c: 3}, x => x * 2)); // {a: 2, b: 4, c: 6}
console.log(mapObject({name: "John", age: 25}, x => typeof x === "string" ? x.toUpperCase() : x)); // {name: "JOHN", age: 25}
console.log(mapObject({}, x => x)); // {}
console.log(mapObject("не объект", x => x)); // ошибка
console.log(mapObject({a: 1}, "не функция")); // ошибка
*/

// 7. Пароль
function generatePassword(length) {
  if (length < 4) {
    console.log('Ошибка: длина пароля должна быть не меньше 4')
    return ''
  }
 
  let lower = 'abcdefghijklmnopqrstuvwxyz'
  let upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
  let digits = '0123456789'
  let special = '!@#$%^&*()'
 
  // Добавляем по одному символу каждого типа
  let password = ''
  password += lower[Math.floor(Math.random() * lower.length)]
  password += upper[Math.floor(Math.random() * upper.length)] 
  password += digits[Math.floor(Math.random() * digits.length)]
  password += special[Math.floor(Math.random() * special.length)]
 
  let allChars = lower + upper + digits + special

  // Добавляем остальные случайные символы
  for (let i = 4; i < length; i++) {
    password += allChars[Math.floor(Math.random() * allChars.length)]
  }
 
  return password
}

/*
console.log(generatePassword(8)); // пароль длиной 8 символов
console.log(generatePassword(12)); // пароль длиной 12 символов
console.log(generatePassword(3)); // ошибка - слишком короткий
*/

// 8. Объединение map и filter
const numbers = [ 2, 5, 8, 10, 3 ];
const resultMapFilter = numbers.map(num => num * 3).filter(num => num > 10);

/*
console.log('numbers:', numbers);
console.log('После map:', numbers.map(n => n * 3));
console.log('После filter:', resultMapFilter);
*/