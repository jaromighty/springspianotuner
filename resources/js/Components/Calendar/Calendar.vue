<script setup>
import { inject, onMounted, ref, watch } from 'vue';
import CalendarDays from '@/Components/Calendar/CalendarDays.vue';
import CalendarHeader from '@/Components/Calendar/CalendarHeader.vue';
import CalendarGrid from '@/Components/Calendar/CalendarGrid.vue';

const dayjs = inject('dayjs');

const TODAY = dayjs().format("YYYY-MM-DD");
const INITIAL_YEAR = ref(dayjs().format("YYYY"));
const INITIAL_MONTH = ref(dayjs().format("M"));

let selectedMonth = ref(dayjs(new Date(INITIAL_YEAR.value, INITIAL_MONTH.value - 1, 1)));
let selectedDay = ref(TODAY);
let currentMonthDays = ref([]);
let previousMonthDays = ref([]);
let nextMonthDays = ref([]);
let days = ref([]);
let currentMonthDisplay = ref("");

const setSelectedDay = (date) => {
    selectedDay.value = date;
}

watch(selectedDay, (newDate, oldDate) => {
    if (days.value.find(day => day.date === oldDate) !== undefined) {
        days.value.find(day => day.date === oldDate).isSelected = false;
    }
    days.value.find(day => day.date === newDate).isSelected = true;
});

onMounted(() => {
    createCalendar();
});

const createCalendar = (year = INITIAL_YEAR.value, month = INITIAL_MONTH.value) => {
    currentMonthDisplay.value = dayjs(new Date(year, month - 1)).format("MMMM YYYY");

    days.value = [];

    currentMonthDays.value = createDaysForCurrentMonth(
        year,
        month,
        dayjs(`${year}-${month}-01`).daysInMonth()
    );

    previousMonthDays.value = createDaysForPreviousMonth(year, month);

    nextMonthDays.value = createDaysForNextMonth(year, month);

    days.value = [
        ...previousMonthDays.value,
        ...currentMonthDays.value,
        ...nextMonthDays.value
    ];
}

const getNumberOfDaysInMonth = (year, month) => {
  return dayjs(`${year}-${month}-01`).daysInMonth();
}

const createDaysForCurrentMonth = (year, month) => {
    return [...Array(getNumberOfDaysInMonth(year, month))].map((day, index) => {
        let date = dayjs(`${year}-${month}-${index + 1}`).format("YYYY-MM-DD");
        return {
            date,
            dayOfMonth: index + 1,
            isCurrentMonth: true,
            isSelected: date === selectedDay.value ? true : false,
            isToday: date === TODAY ? true : false
        };
    });
}

const createDaysForPreviousMonth = (year, month) => {
    const firstDayOfTheMonthWeekday = getWeekday(currentMonthDays.value[0].date);
    const previousMonth = dayjs(`${year}-${month}-01`).subtract(1, "month");

    const visibleNumberOfDaysFromPreviousMonth = firstDayOfTheMonthWeekday
        ? firstDayOfTheMonthWeekday - 1
        : 6;
    
    const previousMonthLastMondayDayOfMonth = dayjs(currentMonthDays.value[0].date)
        .subtract(visibleNumberOfDaysFromPreviousMonth, "day")
        .date();

    return [...Array(visibleNumberOfDaysFromPreviousMonth)].map((day, index) => {
        return {
            date: dayjs(
                `${previousMonth.year()}-${previousMonth.month() + 1}-${
                previousMonthLastMondayDayOfMonth + index
                }`
            ).format("YYYY-MM-DD"),
            dayOfMonth: previousMonthLastMondayDayOfMonth + index,
            isCurrentMonth: false,
            isSelected: false,
            isToday: false,
        };
    });
}

const createDaysForNextMonth = (year, month) => {
    const lastDayOfTheMonthWeekday = getWeekday(
        `${year}-${month}-${currentMonthDays.value.length}`
    );

    const nextMonth = dayjs(`${year}-${month}-01`).add(1, "month");

    const visibleNumberOfDaysFromNextMonth = lastDayOfTheMonthWeekday
        ? 7 - lastDayOfTheMonthWeekday
        : lastDayOfTheMonthWeekday;

    return [...Array(visibleNumberOfDaysFromNextMonth)].map((day, index) => {
        return {
            date: dayjs(
                `${nextMonth.year()}-${nextMonth.month() + 1}-${index + 1}`
            ).format("YYYY-MM-DD"),
            dayOfMonth: index + 1,
            isCurrentMonth: false,
            isSelected: false,
            isToday: false,
        };
    });
}

const getWeekday = (date) => {
    return dayjs(date).weekday();
}

const goToPreviousMonth = () => {
    let previousMonth = dayjs(selectedMonth.value).subtract(1, "month");
    selectedMonth.value = previousMonth;
    createCalendar(previousMonth.format("YYYY"), previousMonth.format("M"));
}
const goToNextMonth = () => {
    let nextMonth = dayjs(selectedMonth.value).add(1, "month");
    selectedMonth.value = nextMonth;
    createCalendar(nextMonth.format("YYYY"), nextMonth.format("M"));
}
</script>

<template>
    <CalendarHeader
        :current-month="currentMonthDisplay"
        @previous="goToPreviousMonth"
        @next="goToNextMonth"
    />
    <CalendarDays />
    <CalendarGrid :days="days" @select="setSelectedDay($event)" />
</template>