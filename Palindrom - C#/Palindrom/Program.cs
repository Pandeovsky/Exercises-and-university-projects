using System;
using System.Linq;
using System.Runtime.InteropServices.ComTypes;

namespace Palindrom
{
    class Program
    {
        public static bool IsPalindromWithLinq(string word)
        {
            if (String.IsNullOrEmpty(word))
            {
                Console.WriteLine("String is empty!");
                return false;
            }

            word = word.Replace(" ", "");
            word = word.ToLower();
            return word.SequenceEqual(word.Reverse());
        }

        public static bool IsPalindromClassic(string word)
        {
            word = word.Replace(" ", "");
            word = word.ToLower();
            if (String.IsNullOrEmpty(word))
            {
                Console.WriteLine("String is empty!");
            return false;
            }

            for (int i = 0; i < word.Length; i++)
            {
                if (word[i] != word[word.Length - i - 1])
                {
                    return false;
                }
            }
            return true;
        }

        static void Main(string[] args)
        {
            var ifEnd = true;
            while (ifEnd == true)
            {

                Console.Write("What is palindrom to check? \n");
                var word = Console.ReadLine();
                Console.WriteLine("Check with LINQ: " + IsPalindromWithLinq(word));
                Console.WriteLine("Classic check: " + IsPalindromClassic(word));
                Console.WriteLine("Press ENTER to re-enter the palindrom!");
                Console.WriteLine("Press Escape to quit ");
                var key = Console.ReadKey().Key;
                if (key == ConsoleKey.Escape)
                {
                    ifEnd = false;
                }
            }
        }
    }
}
