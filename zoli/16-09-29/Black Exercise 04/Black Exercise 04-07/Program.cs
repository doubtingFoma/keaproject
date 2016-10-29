using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_04_07
{
    class Program
    {
        static void Main(string[] args)
        {
            int[] Numbers;
            Numbers = new int[3];

            //interate through every element of the array and fill it with values
            for (int i = 0; i < Numbers.Length; i++)
            {
                Console.Write($"Number {i + 1}: ");
                while (!Int32.TryParse(Console.ReadLine(), out Numbers[i]))
                {
                    Console.Write($"Number {i + 1}: ");
                }

            }

            string find;
            

            Console.Write("Write 'max' or 'min' to get the highest or the lowest numbers from the array: ");
            find = Console.ReadLine();

            //if we don't write anything, it will automatically call the first function
            if (find == "max" || find == "")
            {
                //we don't pass an argument, so it will call the first GetEdge function
                Console.WriteLine("The largest number is {0}", GetEdge(Numbers));
            }
            else if (find == "min")
            {
                
                Console.WriteLine("The smallest number is {0}", GetEdge(Numbers, "min"));
            }
            else
            {
                //we pass the default value again
                Console.WriteLine("Error, but the smallest number is {0}", GetEdge(Numbers));
            }

            Console.ReadKey();
        }

        static int GetEdge(int[] Numbers)
        {
            //just return with the maximum value
            return Numbers.Max();
        }

        static int GetEdge(int[] Numbers, string find)
        {
            switch (find)
            {
                //if we use return, we don't need the break, because the function already stopped working
                case "max":
                    return Numbers.Max();
                case "min":
                    return Numbers.Min();
                default:
                    //this is neccesary, because VS throws an error when I assign no return to default (even though it will never happen)
                    throw new ArgumentException("Invalid value", "No comment");
            }
        }



    }
}
