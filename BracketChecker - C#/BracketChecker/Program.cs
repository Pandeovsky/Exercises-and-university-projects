using System;
using System.Collections;
using System.Collections.Generic;
using System.IO;
using System.Text;

namespace BracketChecker
{
    class Program
    {
        public static string BracketChecker(string str)
        {
            Stack myStack = new Stack();
            for (int i = 0; i < str?.Length; i++)
            {
                if (str[i].Equals('{'))
                {
                    myStack.Push(str[i]);
                }
                else if (str[i].Equals('}'))
                {
                    try
                    {
                        myStack.Pop();
                    }
                    catch (InvalidOperationException)
                    {
                        return "Błąd!";
                    }

                }
            }
                
            if (myStack.Count == 0)
            {
                return "Klamry są w porządku!";
            }
            else
            {
                return "Błąd, klamry się nie zgadzają!";
            }
        }

        static void Main(string[] args)
        {
            var str = "{{{{}}}}";
            Console.WriteLine(BracketChecker(str));
            Console.ReadLine();
        }
    }
}
