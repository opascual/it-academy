const fizzbuzz = require('./fizzbuzz');

describe('fizzbuzz', () => {
    test("should return an error if we receive not a number", () => {
        const expected = 'Error: the argument should be a number';
        const result = fizzbuzz('10');
        expect(expected).toBe(result);
    });
    test("should print 1 if we receive 1", () => {
        const expected = 1;
        const result = fizzbuzz(1);
        expect(expected).toBe(result);
    });

    test("should print fizz if we receive 3", () => {
        const expected = 'fizz';
        const result = fizzbuzz(3);
        expect(expected).toBe(result);
    });

    test("should print fizz if we receive a multiple of 3", () => {
        const expected = 'fizz';
        const result = fizzbuzz(6);
        expect(expected).toBe(result);
    });

    test("should print buzz if we receive 5", () => {
        const expected = 'buzz';
        const result = fizzbuzz(5);
        expect(expected).toBe(result);
    });

    test("should print buzz if we receive a multiple of 5", () => {
        const expected = 'buzz';
        const result = fizzbuzz(10);
        expect(expected).toBe(result);
    });

    test("should print fizzbuzz if we receive a multiple of 3 and 5", () => {
        const expected = 'fizzbuzz';
        const result = fizzbuzz(15);
        expect(expected).toBe(result);
    });
});