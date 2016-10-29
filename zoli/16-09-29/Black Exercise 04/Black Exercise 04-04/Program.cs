using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_04_04
{
    class Program
    {
        static void Main(string[] args)
        {
            //simple integer array that contains 3 elements
            int[] Numbers;
            Numbers = new int[3];

            //interate through every elemnt of the array and fill it with values
            for (int i = 0; i < Numbers.Length; i++)
            {
                Console.Write($"Number {i + 1}: ");
                while (!Int32.TryParse(Console.ReadLine(), out Numbers[i]))
                {
                    Console.Write($"Number {i + 1}: ");
                }

            }

            //we first get the larger number between N1 and N2, and then compare that to N3. This way, we get the largest of all
            Console.WriteLine("The largest number is {0}", GetMax(Numbers) );

            Console.ReadKey();

        }

        static int GetMax(int[] Numbers)
        {
            //we simply return the largest number in the array
            return Numbers.Max();

        }
    }
}
