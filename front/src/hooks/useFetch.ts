import { axiosApi } from '@/libs/axios';
import { useQuery } from 'react-query';

export const useFetch = (endPoint: string) => {
  const { data, isLoading, isError } = useQuery(endPoint, () => {
    const response = axiosApi.get(endPoint);
    return response;
  });

  return { data, isLoading, isError };
};
