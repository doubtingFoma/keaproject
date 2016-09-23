using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0202
{
    class Program
    {
        static void Main(string[] args)
        {
            // Rows and elements
            const int LineNumber = 10;
            const int ElemNumber = 5;
            int currentNumber = 1;

            // Loop through rows
            for (int i = 0; i < LineNumber; i++)
            {
                // Loop through elements 
                for (int j = 0; j < ElemNumber; j++)
                {
                    Console.Write(currentNumber + " ");
                    if (currentNumber  % ElemNumber == 0)
                    {
                        Console.WriteLine("\t " + currentNumber);
                    }
                    currentNumber++;
                }
            }
        }
    }
}
