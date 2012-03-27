using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
namespace ArrayExpenseReport
{
    class Program
    {
        static void Main(string[] args)
        {
            // HouseKeeping 
            /* 
            * Employee Name
            Number of Days of the Trip
            Meals Expense
            Hotel Expense
            Car Rental Expense
            Air Fare Expense
            Expense Advance
            */
　
            string strLine; 
            string name; 
            int numDays; 
            double amtMeals; 
            double amtAirfare; 
            double carRental; 
            double amtHotel; 
            double amtAdvance; 
            
            // Input 
            StreamReader objInput = new StreamReader("C:\\Users\\owner\\Dropbox\\Programs\\ArrayExpenseReport\\ExpenseReport.txt"); 
            Console.WriteLine("Employee\tMeals\t\tAverage\t\tAirFare\t\tHotels\t\tCar Rental\tExpense\t\tTotal");
            Console.WriteLine("Name\t\t\t\tMeals\t\t\t\t\t\t\t\tAdvance\t\tAmount Due"); 
            double tMeals = 0; 
            double tHotels = 0; 
            double tRental = 0; 
            double tAirfare = 0; 
            double tAmount = 0; 
            double taverageMeals = 0; 
            double tAdvance = 0;
            while((strLine = objInput.ReadLine()) != null) 
            {
                string[] words = strLine.Split('|'); 
                name = words[0];
                numDays = int.Parse(words[1]);
                amtMeals = double.Parse(words[2]);
                amtHotel = double.Parse(words[3]);
                carRental = double.Parse(words[4]);
                amtAirfare = double.Parse(words[5]);
                amtAdvance = double.Parse(words[6]);
                tMeals = tMeals + amtMeals;
                tHotels = tHotels + amtHotel;
                tRental = tRental + carRental;
                tAirfare = tAirfare + amtAirfare;
                tAdvance = tAdvance + amtAdvance;
                double totalAmount = amtAdvance - (amtMeals + amtAirfare + carRental + amtHotel);
                tAmount = tAmount + totalAmount;
                double averageMeals = amtMeals / numDays;
                taverageMeals = taverageMeals + averageMeals;
                Console.WriteLine("{0:C}\t{1:C}\t\t{2:C}\t\t{3:C}\t\t{4:C}\t\t{5:C}\t\t{6:C}\t{7:C}", name, amtMeals, averageMeals, amtHotel, carRental, amtAirfare, amtAdvance, totalAmount); 
            }
            Console.WriteLine("\t\t{0:C}\t{1:C}\t\t{2:C}\t{3:C}\t{4:C}\t\t{5:C}\t{6:C}", tMeals, taverageMeals, tHotels, tRental, tAirfare, tAdvance, tAmount); 
            }
    }
}
