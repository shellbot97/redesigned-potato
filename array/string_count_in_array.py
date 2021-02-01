# program to calculate the count of occurances of string in array of strings
# ref: https://www.hackerrank.com/challenges/sparse-arrays/problem


# brute force approach
def matchingStrings(strings, queries):
    res = []
    for query in queries:
        count = 0
        for string in strings:    
            if query == string:
                count += 1
        res.append(count)
    return res


# optimised approcach
def optimised(strings, queries):
  retrun
  


# driver code
print(matchingStrings(['ab', 'ab', 'abc'], ['ab', 'abc', 'bc']))
print(optimised(['ab', 'ab', 'abc'], ['ab', 'abc', 'bc']))
