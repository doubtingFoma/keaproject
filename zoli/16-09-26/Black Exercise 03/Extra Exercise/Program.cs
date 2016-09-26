using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace C
{
    class Program
    {
        static void Main(string[] args)
        {
            // Select table size
            int tableSize = 8;

            // Create rows and columns
            Array[] rows = new Array[tableSize];
            string[] columns = new string[rows.Length];
            // Fill up rows with columns
            for (int i = 0; i < rows.Length; i++)
            {
                // Fill up columns with fields
                string[] currentColumn = new string[rows.Length];
                for (int j = 0; j < columns.Length; j++)
                {
                    Console.WriteLine($"{i}, {j}");

                    if (j % 2 == i % 2)
                    {
                        currentColumn[j] = "black";
                    }
                    else
                    {
                        currentColumn[j] = "white";
                    }
                }
                rows[i] = currentColumn;
            }

            // Print table out
            foreach (var row in rows)
            {
                foreach (var column in row)
                {
                    Console.Write($"{column} ");
                }

                Console.WriteLine("");
            }

            Console.ReadKey();
        }
    }
}